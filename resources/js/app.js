import './bootstrap';
import '../sass/app.scss';


import LikeButton from './components/LikeButton';

if (document.getElementById('react-like-button')) {
  ReactDOM.render(<LikeButton />, document.getElementById('react-like-button'));
}