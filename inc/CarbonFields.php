<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'add_fields' );

function add_fields() {

    // Theme options
    Container::make('theme_options', 'General info')
        ->add_fields( array(
            Field::make( 'text', 'email_address', 'Email Address' ),
            Field::make( 'text', 'linkedin_link', 'LinkedIn Link' )
        ) );
    
    // Navigation Main
     // Theme options
    Container::make('theme_options', 'Navigation Main')
        ->add_fields( array(
            Field::make( 'text', 'navigationmain_buttontitle', 'Main Button Title' ),
            Field::make( 'text', 'navigationmain_buttonlink', 'Main Button Link' )
                ->set_attribute( 'placeholder', 'mailto:' )
        ) );

    // Home Hero
    Container::make('post_meta', 'Home Hero')
        ->where( 'post_type', '=', 'page' )
        ->add_fields( array(
            Field::make( 'text', 'homehero_subtitle', 'Subtitle' ),
            Field::make( 'text', 'homehero_title', 'Title' ),
            Field::make( 'image', 'homehero_image', 'Image' ),
        ) );

    // Home Introduction
    Container::make('post_meta', 'Home Introduction')
        ->where( 'post_type', '=', 'page' )
        ->add_fields( array(
            Field::make( 'text', 'homeintroduction_title', 'Title' ),
            Field::make( 'rich_text', 'homeintroduction_text', 'Text' ),
            Field::make( 'text', 'homeintroduction_buttontitle', 'Button Title' ),
            Field::make( 'text', 'homeintroduction_buttonlink', 'Button Link' )
                ->set_attribute( 'placeholder', 'mailto:' )
        ) );

    // Logo Overview
    Container::make('post_meta', 'Logo Overview')
        ->where( 'post_type', '=', 'page' )
        ->add_fields( array(
            Field::make( 'text', 'logooverview_title', 'Title' ),
            Field::make( 'media_gallery', 'logooverview_gallery', 'Logos' ),
        ) );

    // Cards Overview
    Container::make('post_meta', 'Cards Overview')
        ->where( 'post_type', '=', 'page' )
        ->add_fields( array(
            Field::make( 'text', 'cardsoverview_title', 'Title' ),
            Field::make( 'complex', 'cardsoverview_projects', 'Projects' )
                ->add_fields('project', array(
                    Field::make( 'image', 'image', 'Image' ),
                    Field::make( 'text', 'link', 'Link' ),
                    Field::make( 'text', 'title', 'Title' ),
                    Field::make( 'text', 'subtitle', 'Subtitle' ),
                )),
        ) );

    // Videos Overview
    Container::make('post_meta', 'Block CTA')
        ->where( 'post_type', '=', 'page' )
        ->add_fields( array(
            Field::make( 'text', 'blockcta_title', 'Title' ),
            Field::make( 'text', 'blockcta_subtitle', 'Subtitle' ),
            Field::make( 'text', 'blockcta_buttontitle', 'Button Title' ),
            Field::make( 'text', 'blockcta_buttonlink', 'Button Link' )
                ->set_attribute( 'placeholder', 'mailto:' )
        ) );
}

