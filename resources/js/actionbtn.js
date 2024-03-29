function handleLike(button) {
    const postId = button.getAttribute('data-post-id');
    const isLiked = button.getAttribute('data-liked') === 'true';

    // Send Ajax request
    fetch(`/like/${postId}`, {
            method: isLiked ? 'DELETE' : 'POST', // Use DELETE to unlike, POST to like
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Update UI based on response
            const span = button.querySelector('span');
            let counter = Number(span.textContent);
            data.liked ? counter++ : counter--;
            span.textContent = counter;
            span.classList.remove(data.liked ? 'bi-hand-thumbs-up' : 'bi-hand-thumbs-up-fill');
            span.classList.add(data.liked ? 'bi-hand-thumbs-up-fill' : 'bi-hand-thumbs-up');

            // Update data-liked attribute
            button.setAttribute('data-liked', data.liked ? 'true' : 'false');
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
