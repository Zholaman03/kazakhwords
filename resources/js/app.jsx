import './bootstrap';
import '../css/app.css';
import React from 'react';
import ReactDOM from 'react-dom';

import LikeButton from './components/LikeButton';

if (document.getElementById('react-like-button')) {
  ReactDOM.render(<LikeButton />, document.getElementById('react-like-button'));
}
