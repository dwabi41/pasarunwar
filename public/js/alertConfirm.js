function confirmDelete(itemId,url) {
    alertify.confirm("Apakah anda yakin ingin menghapus data ini?", function (e) {
        if (e) {
            window.location.href = url + itemId;
        }
    }).setHeader('Notification');
}