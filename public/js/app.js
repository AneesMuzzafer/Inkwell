console.log("Inkwell!");

function displayImage(input) {
    const preview = document.getElementById('preview');
    const file = input.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
    }
}

function toggleLike($id) {
    let likeButton = document.getElementById("like");

    const liked = document.getElementById("liked");
    const unliked = document.getElementById("unliked");
    const totalLikes = document.getElementById("total-likes");

    const data = {
        story_id: $id
    };
    fetch("/like-story", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)

    }).then(response => {
        if (response.status == 401) {
            window.alert("You need to login to like this story");
            return null;
        }
        return response.json();
    })
        .then(data => {
            if (!data) return;
            if (data.isLiked == false) {
                likeButton.setAttribute("data-liked", "false")
                unliked.style.display = 'inline-block';
                liked.style.display = 'none';
                totalLikes.innerText = +totalLikes.innerText - 1;

            } else {
                likeButton.setAttribute("data-liked", "true")
                liked.style.display = 'inline-block';
                unliked.style.display = 'none';
                totalLikes.innerText = +totalLikes.innerText + 1;
            }
        }).catch((e) => console.log(e));

}


function submitForm() {
    document.getElementById("category-form").submit();
}

function next() {
    pageElement = document.getElementById("page");
    pageElement.value = +pageElement.value + 1;
    submitForm();
}

function previous() {
    pageElement = document.getElementById("page");
    pageElement.value = +pageElement.value - 1;
    submitForm();
}

function doSearch() {
    searchText = document.getElementById("search-text").value;
    document.getElementById("search").value = searchText;
    submitForm();
}
