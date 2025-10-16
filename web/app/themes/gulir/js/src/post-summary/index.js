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
const GulirSummaryPanel = () => {
	return (
		<PluginDocumentSettingPanel
			name="gulir-summary"
			title={__('Article Summary', 'gulir')}
			className="gulir-summary"
		>
			<p>
				{__(
					'Write a summary that will be appended to the top of the article content.',
					'gulir'
				)}
			</p>
			<SummaryTitleEditor />
			<SummaryEditor />
		</PluginDocumentSettingPanel>
	);
};

registerPlugin('plugin-document-setting-panel-gulir-summary', {
	render: connectWithSelect(GulirSummaryPanel),
	icon: null,
});
