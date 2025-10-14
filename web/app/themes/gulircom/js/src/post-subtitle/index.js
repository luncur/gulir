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
const NewskitSubtitlePanel = ({ subtitle }) => {
	// Update the DOM when subtitle value changes.
	useEffect(() => {
		appendSubtitleToTitleDOMElement(subtitle);
	}, [subtitle]);

	return (
		<PluginDocumentSettingPanel
			name="newskit-subtitle"
			title={__('Article Subtitle', 'newskit')}
			className="newskit-subtitle"
		>
			{__('Set a Subtitle for the Article', 'newskit')}
			<SubtitleEditor />
		</PluginDocumentSettingPanel>
	);
};

registerPlugin('plugin-document-setting-panel-newskit-subtitle', {
	render: connectWithSelect(NewskitSubtitlePanel),
	icon: null,
});
