// resources/js/components/LikeButton.jsx
import React, { useState } from 'react';

const LikeButton = () => {
  const [liked, setLiked] = useState(false);

  const handleLikeClick = () => {
    setLiked(!liked);
    // Дополнительная логика для отправки запроса на сервер или обработки лайка
    alert('Лайкнули пост!');
  };

  return (
    <>
    <button onClick={handleLikeClick}>
      {liked ? 'Убрать лайк' : 'Поставить лайк'}
    </button>
    </>
  );
};

export default LikeButton;
