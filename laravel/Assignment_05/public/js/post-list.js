async function deleteById(id) {

    console.log(id);
    if (confirm('Are you sure want to delete?')) {
        $.ajax({
            url: `/api/book/delete/${id}`,
            type: 'DELETE',
            success: function (result) {
                location.reload();
                alert("Deleted Successfully");
            },
            error: function (result) {
                alert("fail");
            }
        });
    }


}
function createBook() {
    var createdData = {
        title: $('[name=title]').val(),
        type: $('[name=type]').val(),
        price: $('[name=price]').val(),
        quantity: $('[name=quantity]').val(),
        author_id: $('[name=author_id]').val(),
        releaseDate: $('[name=releaseDate]').val(),
    }

    $.ajax({
        url: "/api/book/create",
        type: 'post',
        data: createdData,
        dataType: 'json', // added data type
        success: function (res) {
            window.location.replace("/apiView/list-view");
        }
    });
}
function editbook() {
    var editedData = {
        title: $('[name=title]').val(),
        type: $('[name=type]').val(),
        price: $('[name=price]').val(),
        quantity: $('[name=quantity]').val(),
        author_id: $('[name=author_id]').val(),
        releaseDate: $('[name=releaseDate]').val(),
    }

    $.ajax({
        url: "/api/book/edit/" + bookId,
        type: 'post',
        data: editedData,
        dataType: 'json', // added data type
        success: function (res) {
            window.location.replace("/apiView/list-view");
        }
    });
}