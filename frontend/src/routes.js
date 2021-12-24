import React from 'react';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import logon from './pages/logon';
import register from './pages/register';
import lists from './pages/lists';

export default function Routes() {
  return (
    <BrowserRouter>
      <Switch>
        <Route path="/" exact component={logon} />
      </Switch>
    </BrowserRouter>
  );
}