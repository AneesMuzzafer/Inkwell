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

function submitCompose() {
    const editableContent = document.getElementById("editableContent");
    const content = document.getElementById("content");

    content.value = editableContent.innerHTML;

    document.getElementById("form-compose").submit();
}

function next() {
    pageElement = document.getElementById("page");
    pageOldElement = document.getElementById("page-old");
    pageElement.value = +pageOldElement.value + 1;
    submitForm();
}

function previous() {
    pageElement = document.getElementById("page");
    pageOldElement = document.getElementById("page-old");
    pageElement.value = +pageOldElement.value - 1;
    submitForm();
}

const clear = document.getElementById("clear-search");

function onSearchInput(input) {
    if (input.value) {
        clear.style.display = 'inline-block';
    } else {
        clear.style.display = 'none';
    }
    console.log(input.value)
}

if (clear) {
    clear.addEventListener("click", function () {
        const search = document.getElementById("search");
        search.value = "";
        submitForm();
    })
}

// document.addEventListener("DOMContentLoaded", function () {
    // const editableContent = document.getElementById("editableContent");

    // if(editableContent){
    //     editableContent.addEventListener("focusin", function() {
    //         const editor = document.getElementById("editor");
    //         editor.style.display = "flex";
    //     })

    //     editableContent.addEventListener("focusout", function() {
    //         const editor = document.getElementById("editor");
    //         editor.style.display = "none";
    //     })
    // }

    function applyStyle(style, value = null) {
        if (document.queryCommandSupported(style)) {
            document.execCommand(style, false, value);
        } else {
            console.error("Command not supported:", style);
        }
    }

    function insertParagraphBreak() {
        document.execCommand("insertParagraph", false, null);
    }

    function createLink() {
        const url = prompt("Enter the URL:");
        if (url) {
            applyStyle("createLink", url);
        }
    }

    // document.getElementById("boldButton").addEventListener("click", function () {
    //     applyStyle("bold");
    // });

    // document.getElementById("italicButton").addEventListener("click", function () {
    //     applyStyle("italic");
    // });

    // document.getElementById("underlineButton").addEventListener("click", function () {
    //     applyStyle("underline");
    // });

    // document.getElementById("linkButton").addEventListener("click", function () {
    //     createLink();
    // });

    // document.getElementById("paragraphBreakButton").addEventListener("click", function () {
    //     insertParagraphBreak();
    // });

// });


function confirmDeletionAction(id) {
    let userConfirmed = window.confirm("Are you sure you want to perform this action?");

    if (userConfirmed) {
        window.location.href = `/story/delete/${id}`;
        // alert("Action performed!");
    } else {
        // alert("Action canceled.");
    }
}
