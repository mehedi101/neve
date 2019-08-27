<?php
/**
 * Footer class for Header Footer Grid.
 *
 * Name:    Header Footer Grid
 * Author:  Bogdan Preda <bogdan.preda@themeisle.com>
 *
 * @version 1.0.0
 * @package HFG
 */

namespace HFG\Core\Builder;

use HFG\Main;

/**
 * Class Footer
 *
 * @package HFG\Core\Builder
 */
class Footer extends Abstract_Builder {
	/**
	 * Builder name.
	 */
	const BUILDER_NAME = 'footer';

	/**
	 * Footer constructor.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function init() {
		$this->set_property( 'title', __( 'Footer', 'neve' ) );
		$this->devices = [
			'desktop' => __( 'Footer', 'neve' ),
		];
	}

	/**
	 * Method called via hook.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function load_template() {

		Main::get_instance()->load( 'footer-wrapper' );
	}

	/**
	 * Render builder row.
	 *
	 * @param string $device_id The device id.
	 * @param string $row_id The row id.
	 * @param array  $row_details Row data.
	 */
	public function render_row( $device_id, $row_id, $row_details ) {
		Main::get_instance()->load( 'footer-row-wrapper' );
	}

	/**
	 * Get builder id.
	 *
	 * @return string Builder id.
	 */
	public function get_id() {
		return self::BUILDER_NAME;
	}

	/**
	 * Overrides parent method to limit rows.
	 *
	 * @return array
	 * @since   1.0.0
	 * @access  protected
	 */
	protected function get_rows() {
		$description = sprintf(
			/* translators: %s link to documentation */
			esc_html__( 'You can easily drag-and-drop and arrange the available components you can find at the bottom of the builder. Each component has specific options you can customize once that component is clicked on. Also, each component\'s width can be adjusted so that it corresponds to your needs. %s.', 'neve' ),
			/* translators: %s link text */
			sprintf(
				'<a target="_blank" href="https://docs.themeisle.com/article/946-neve-doc#footer-builder">%s</a>',
				esc_html__( 'Read full documentation', 'neve' )
			)
		);

		return [
			'top'    => array(
				'title'       => __( 'Footer Top', 'neve' ),
				'description' => $description,
			),
			'bottom' => array(
				'title'       => __( 'Footer Bottom', 'neve' ),
				'description' => $description,
			),
		];
	}
}
