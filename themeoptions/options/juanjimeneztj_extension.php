<?php
if ( class_exists( 'Redux' ) ) {
	$opt_name = 'juanjimeneztj';
    Redux::setExtensions( $opt_name, dirname( __FILE__ ) . '/extensions/' );
}
// Just keep from getting errors.

add_action( "redux/extension/customizer/control/includes","juanjimeneztj_customizer_fields" );
function juanjimeneztj_customizer_fields(){
    if ( ! class_exists( 'Redux_Customizer_Control_info' ) ) {
        class Redux_Customizer_Control_info extends Redux_Customizer_Control {
            public $type = "redux-info";
        }
    }
    if ( ! class_exists( 'Redux_Customizer_Control_juanjimeneztj_slides' ) ) {
        class Redux_Customizer_Control_juanjimeneztj_slides extends Redux_Customizer_Control {
            public $type = "redux-juanjimeneztj_slides";
        }
    }
    if ( ! class_exists( 'Redux_Customizer_Control_juanjimeneztj_icons' ) ) {
        class Redux_Customizer_Control_juanjimeneztj_icons extends Redux_Customizer_Control {
            public $type = "redux-juanjimeneztj_icons";
        }
    }
     if ( ! class_exists( 'Redux_Customizer_Control_background' ) ) {
        class Redux_Customizer_Control_background extends Redux_Customizer_Control {
            public $type = "redux-background";
        }
    }
    if ( ! class_exists( 'Redux_Customizer_Control_sorter' ) ) {
        class Redux_Customizer_Control_sorter extends Redux_Customizer_Control {
            public $type = "redux-sorter";
        }
    }
}



