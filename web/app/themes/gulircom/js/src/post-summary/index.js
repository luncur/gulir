'use strict';

/**
 * WordPress dependencies
 */
import { registerPlugin } from '@wordpress/plugins';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import SummaryEditor from './SummaryEditor';
import SummaryTitleEditor from './SummaryTitleEditor';
import { connectWithSelect } from './utils';

/**
 * Component to be used as a panel in the Document tab of the Editor.
 *
 * https://developer.wordpress.org/block-editor/developers/slotfills/plugin-document-setting-panel/
 */
const NewskitSummaryPanel = () => {
	return (
		<PluginDocumentSettingPanel
			name="newskit-summary"
			title={__('Article Summary', 'newskit')}
			className="newskit-summary"
		>
			<p>
				{__(
					'Write a summary that will be appended to the top of the article content.',
					'newskit'
				)}
			</p>
			<SummaryTitleEditor />
			<SummaryEditor />
		</PluginDocumentSettingPanel>
	);
};

registerPlugin('plugin-document-setting-panel-newskit-summary', {
	render: connectWithSelect(NewskitSummaryPanel),
	icon: null,
});
