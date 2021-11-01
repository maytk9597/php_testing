/**
 * To set data table
 */
$(document).ready(function () {
    const postTable = $("#post-list").DataTable({
        sDom: "lrtip"
    });

    $("#search-click").click(function () {
        postTable.search($("#search-keyword").val()).draw();
    });
});

/**
 * To show post detail
 * @param {Object} bookInfo bookinfo
 * @returns void
 */
function showPostDetail(bookInfo) {
    $("#post-detail #post-title").text(bookInfo.title);
    $("#post-detail #post-description").text(bookInfo.description);
    if (bookInfo.status == "0") {
        $("#post-detail #post-status").text("Inactive");
    } else {
        $("#post-detail #post-status").text("Active");
    }
    $("#post-detail #post-created-at").text(
        moment(bookInfo.created_at).format("YYYY/MM/DD")
    );
    $("#post-detail #post-created-user").text(bookInfo.created_user);
    $("#post-detail #post-updated-at").text(
        moment(bookInfo.updated_at).format("YYYY/MM/DD")
    );
    $("#post-detail #post-updated-user").text(bookInfo.updated_user);
}

/**
 * To show post delete confirm
 * @param {Object} bookInfo bookInfo
 * @returns void
 */
function showDeleteConfirm(bookInfo) {

    $("#book-delete #book-id").text(bookInfo.id);
    $("#book-delete #book-title").text(bookInfo.title);
    $("#book-delete #book-type").text(bookInfo.type);
    $("#book-delete #book-price").text(bookInfo.price);
    $("#book-delete #book-authorName").text(bookInfo.name);
    $("#book-delete #book-releaseDate").text(bookInfo.releaseDate);
}

/**
 * To delete post by id
 * @returns void
 */

async function deleteById(csrf_token) {
    await $.ajax({
        url: "/book/list/delete/" + $("#book-delete #book-id").text(),
        type: "POST",
        data: {
            _token: csrf_token
        },
        dataType: "text",
        success: function (result) {
            console.log(result);
            location.reload();
        }
    });
}
