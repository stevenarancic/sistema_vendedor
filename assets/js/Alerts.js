function alertButton() {
    Swal.fire({
        title: 'Tem certeza?',
        text: 'Essa ação não pode ser desfeita.',
        icon: 'warning',
        showConfirmButton: true,
        confirmButtonText: 'Sim',
        confirmButtonColor: '#78c696',
        showDenyButton: true,
        denyButtonText: 'Não',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "../../App/Controller/DeleteVendedor.php?id=<?= $vendedor['id'] ?>";
        } else if (result.isDenied) {}
    })
}