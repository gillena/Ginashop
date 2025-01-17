// ratings
const itemCommentHtml = (item) => {
  return `
    <li class="comment-item">
        <div class="comment-body">
            <div class="product-comment">
                <div class="comment-img">
                    <img src="${
                      item.avatar ? item.avatar : 'userDefault.webp'
                    }" alt="${item.fullname} + image">
                </div>
                <div class="comment-inner">
                    <div class="commenter">
                        <div class="title">
                            ${item.fullname}
                            <span class="comment-date">${item.create_at}</span>
                        </div>
                        <span class="commenter-rating">
                            ${renderStars(item.star)}
                        </span>
                    </div>
                    <div class="comment-text">
                        <span class="mb-0">“${item.comment}”</span>
                    </div>
                </div>
            </div>
        </div>
    </li>
    `;
};

const addRatingProd = async () => {
  try {
    const formData = new FormData($('#formRatings').get(0));
    const response = await fetch(`add-product-rating`, {
      method: 'POST',
      body: formData,
    });

    if (response.ok) {
      const data = await response.json();

      if (data.code == 400) {
        showToast('error', data.message);
      }

      if (data.code == 200) {
        updateHtmlCart(data.data);
        showToast('success', data.message);
      }

      getDataRatingProd();
      return;
    } else {
      throw new Error('Request failed');
    }
  } catch (error) {
    console.log(error);
  }
};

const getDataRatingProd = async () => {
  const currentURL = window.location.href;
  const match = currentURL.match(/-(\d+)$/);
  if (match) {
    //lấy ra id
    const id = match[1];
    try {
      const response = await fetch('product-rating/' + id);

      if (response.ok) {
        const data = await response.json();
        if (data.code == 200) {
          updateHtmlRatingProd(data.data);
        }
      }
    } catch (error) {
      console.log(error);
    }
  }
};
getDataRatingProd();

const notCommentHtml = () =>
  `<div class="not-comment">
          <p>Chưa có đánh giá.</p>
   </div>`;

const updateHtmlRatingProd = (data) => {
  var $commentList = $('#comment-list');
  $commentList.empty();
  if (data.length > 0) {
    data.forEach(function (item) {
      $commentList.append(itemCommentHtml(item));
    });
  } else {
    $commentList.append(notCommentHtml());
  }
};
