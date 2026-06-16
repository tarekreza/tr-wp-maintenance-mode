import domReady from '@wordpress/dom-ready';
import { createRoot } from '@wordpress/element';
import App from './App.jsx';


domReady( () => {
    const root = createRoot(
        document.getElementById( 'tr-wp-maintenance-mode-admin-app' )
    );

    root.render( <App /> );
} );