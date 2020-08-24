/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//require('./components/Example');

import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {
    BrowserRouter as Router,
    Route, 
    Switch
} from 'react-router-dom';
import Header from './components/Header';

/* class Home extends Component {
    render () {
        return (
            <div>
                <Header></Header>
            </div>
        )
    }
} */

function Artikeln() {
        return (
            <div>
                Component Artikel
            </div>
    );
}

export default function App() {
    return (
        <Router>
            <Switch>
                <Route path="/index"> <Header /> </Route>
                <Route path="/post"> <Artikeln /> </Route>
                {/* <Route path="/post" component={Artikeln} /> */}
            </Switch>    
        </Router>
    );
}

ReactDOM.render(
    <App />,
document.getElementById('root')
);
