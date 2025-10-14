'use strict';

/**
 * WordPress dependencies
 */
import { registerPlugin } from '@wordpress/plugins';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { useEffect } from '@wordpress/element';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import SubtitleEditor from './SubtitleEditor';
import { appendSubtitleToTitleDOMElement, connectWithSelect } from './utils';

/**
 * Component to be used as a panel in the Document tab of the Editor.
 *
 * https://developer.wordpress.org/block-editor/developers/slotfills/plugin-document-setting-panel/
 */
const GulirSubtitlePanel = ({ subtitle }) => {
	// Update the DOM when subtitle value changes.
	useEffect(() => {
		appendSubtitleToTitleDOMElement(subtitle);
	}, [subtitle]);

	return (
		<PluginDocumentSettingPanel
			name="gulir-subtitle"
			title={__('Article Subtitle', 'gulir')}
			className="gulir-subtitle"
		>
			{__('Set a Subtitle for the Article', 'gulir')}
			<SubtitleEditor />
		</PluginDocumentSettingPanel>
	);
};

registerPlugin('plugin-document-setting-panel-gulir-subtitle', {
	render: connectWithSelect(GulirSubtitlePanel),
	icon: null,
});
