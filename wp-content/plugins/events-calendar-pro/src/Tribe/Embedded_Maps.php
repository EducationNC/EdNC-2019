<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Adds support for direct manipulation of venue co-ordinates via the venue editor.
 */
class Tribe__Events__Pro__Embedded_Maps {
	/**
	 * Script handle for the embedded maps script.
	 */
	const MAP_HANDLE = 'tribe_events_pro_embedded_map';

	/**
	 * Venue latitude, if known.
	 *
	 * @var string
	 */
	protected $lat;

	/**
	 * Venue longitude, if known.
	 *
	 * @var string
	 */
	protected $lng;


	/**
	 * Sets things up to replace the embedded maps generated by the core plugin with ones
	 * which use stored coordinates (longitude/latitude) for positioning rather than the
	 * street address.
	 *
	 * If this is undesirable it can be turned off using a filter hook:
	 *
	 *     add_filter( 'tribe_events_pro_replace_embedded_maps', '__return_false' );
	 *
	 */
	public function __construct() {
		if ( apply_filters( 'tribe_events_pro_replace_embedded_maps', true ) ) {
			add_action( 'tribe_events_map_embedded', array( $this, 'use_venue_coords' ), 10, 2 );
		}
	}

	/**
	 * Update the location information associated with the venue map to use coordinates
	 * in place of a street address, if possible.
	 *
	 * @param $map_index
	 * @param $venue_id
	 */
	public function use_venue_coords( $map_index, $venue_id ) {
		// If we don't have a venue to work with, bail
		if ( ! tribe_is_venue( $venue_id ) ) {
			return;
		}

		// Try to load the coordinates - it's possible none will be set
		$this->lat = get_post_meta( $venue_id, Tribe__Events__Pro__Geo_Loc::LAT, true );
		$this->lng = get_post_meta( $venue_id, Tribe__Events__Pro__Geo_Loc::LNG, true );

		// If we have valid coordinates let's put them to work
		if ( ! $this->are_coords_valid() ) {
			return;
		}
		$this->setup_coords( $map_index );
	}

	/**
	 * Tests to see if the venue coordinates are valid.
	 *encodedAddress
	 * @return bool
	 */
	protected function are_coords_valid() {
		if ( ! is_numeric( $this->lat ) || $this->lat < -90 || $this->lat > 90 ) {
			return false;
		} elseif ( ! is_numeric( $this->lng ) || $this->lng < -180 || $this->lng > 180 ) {
			return false;
		}

		if ( 0 == $this->lat && 0 == $this->lng ){
			return false;
		}

		return true;
	}

	protected function setup_coords( $map_index ) {
		$embedded_maps        = Tribe__Events__Embedded_Maps::instance();
		$venue_data           = $embedded_maps->get_map_data( $map_index );
		$venue_data['coords'] = array( $this->lat, $this->lng );
		$embedded_maps->update_map_data( $map_index, $venue_data );
	}
}
