<!-- Mostra os Toasts de status baseado nos status da requisição -->
<?php
if (isset($_SESSION['status'])) {
    switch ($_SESSION['status']) {
        case 'create':
?>
            <script>
                createConfirmation()
            </script>
        <?php
            break;
        case 'delete':
        ?>
            <script>
                deleteConfirmation()
            </script>
        <?php
            break;
        case 'update':
        ?>
            <script>
                updateConfirmation()
            </script>
    <?php
            break;
        default:
            break;
    }
    ?>
<?php unset($_SESSION['status']);
} else {
}
?>