'use strict';

import { FormToggle } from '@wordpress/components';
import { withDispatch, withSelect } from '@wordpress/data';

import { registerPlugin } from '@wordpress/plugins';
import { PluginPostStatusInfo } from '@wordpress/edit-post';
import { compose } from '@wordpress/compose';
import { __ } from '@wordpress/i18n';

/**
 * Hide updated date
 */
const PostStatusExtensions = ({ meta, postType, updateMetaValue }) => {
	if (!meta) {
		return null;
	}
	const {
		newskit_hide_page_title,
		newskit_hide_updated_date,
		newskit_show_updated_date,
		newskit_show_share_buttons,
	} = meta;
	const {
		hide_date = [],
		show_date = [],
		hide_title = [],
		show_share_buttons = [],
	} = window.newskit_post_meta_post_types;
	const hideDate = 0 <= hide_date.indexOf(postType);
	const showDate = 0 <= show_date.indexOf(postType);
	const hideTitle = 0 <= hide_title.indexOf(postType);
	const showShareButtons = 0 <= show_share_buttons.indexOf(postType);

	if (!hideDate && !showDate && !hideTitle && !showShareButtons) {
		return null;
	}

	return (
		<PluginPostStatusInfo className="newskit__post-meta-toggles">
			{hideDate && (
				<div>
					<label htmlFor="hide_updated_date">
						{__('Hide last updated date', 'newskit')}
					</label>
					<FormToggle
						checked={newskit_hide_updated_date}
						onChange={() =>
							updateMetaValue(
								'newskit_hide_updated_date',
								!newskit_hide_updated_date
							)
						}
						id="hide_updated_date"
					/>
				</div>
			)}
			{showDate && (
				<div>
					<label htmlFor="show_updated_date">
						{__('Show last updated date', 'newskit')}
					</label>
					<FormToggle
						checked={newskit_show_updated_date}
						onChange={() =>
							updateMetaValue(
								'newskit_show_updated_date',
								!newskit_show_updated_date
							)
						}
						id="show_updated_date"
					/>
				</div>
			)}
			{hideTitle && 'page' === postType && (
				<div>
					<label htmlFor="hide_page_title">
						{__('Hide page title', 'newskit')}
					</label>
					<FormToggle
						checked={newskit_hide_page_title}
						onChange={() =>
							updateMetaValue(
								'newskit_hide_page_title',
								!newskit_hide_page_title
							)
						}
						id="hide_page_title"
					/>
				</div>
			)}
			{showShareButtons && 'page' === postType && (
				<div>
					<label htmlFor="newskit_show_share_buttons">
						{__('Show Jetpack share buttons', 'newskit')}
					</label>
					<FormToggle
						checked={newskit_show_share_buttons}
						onChange={() =>
							updateMetaValue(
								'newskit_show_share_buttons',
								!newskit_show_share_buttons
							)
						}
						id="hide_page_title"
					/>
				</div>
			)}
		</PluginPostStatusInfo>
	);
};

/**
 * Map state to props
 */
const mapStateToProps = select => {
	const { getCurrentPostType, getEditedPostAttribute } =
		select('core/editor');
	return {
		meta: getEditedPostAttribute('meta'),
		postType: getCurrentPostType(),
	};
};

const mapDispatchToProps = dispatch => {
	const { editPost } = dispatch('core/editor');
	return {
		updateMetaValue: (key, value) => editPost({ meta: { [key]: value } }),
	};
};

/**
 * Register plugins
 */
const postStatusSidebar = compose([
	withSelect(mapStateToProps),
	withDispatch(mapDispatchToProps),
])(PostStatusExtensions);

registerPlugin('post-status-sidebar', { render: postStatusSidebar });
