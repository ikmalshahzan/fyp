</div>
<!-- Footer -->
<footer class="bg-light text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-dark" href="#">E-Book car Services</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<?php

if (isset($_SESSION['success'])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<?php echo $_SESSION['success']; ?>',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: '<?php echo $_SESSION['error']; ?>',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    unset($_SESSION['error']);
}
?>

</body>

</html>