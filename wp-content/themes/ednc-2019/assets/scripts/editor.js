wp.domReady( () => {
  wp.blocks.unregisterBlockType( 'core/quote' );

  wp.blocks.registerBlockStyle( 'core/heading', {
    name: 'default',
    label: 'Default (Lato)',
    isDefault: true,
  } );

  wp.blocks.registerBlockStyle( 'core/heading', {
    name: 'alt',
    label: 'Merriweather',
  } );
  //wp.blocks.unregisterBlockType( 'core/button' );
	// wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	// wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	// wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );
} );
