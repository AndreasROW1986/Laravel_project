import React from 'react';
import ReactDOM from 'react-dom';
//import { render } from 'sass';

function Header() {
        return (
            <div className="jumbotron">
                <div className="container">
                    <div className="row">
                        <h3 className="display-4">Herzlich willkommen zu meinem Blog!</h3>
                        <p>Da werden verschiedene Beiträge aus aller berümtesten Zeitungen zusammengestellt</p>
                    </div>
                </div>
            </div> 
        );
}

export default Header;

