<footer class="footer d-flex">
    <div class="facebook"><p><a href="#"><img class="img-responsive" alt="" src="../../template/images/facebook-app-symbol.png"></a></p></div>
    <div class="google"><p><a href="#"><img class="img-responsive" alt="" src="../../template/images/social-google-plus-square-button.png"></a></p></div>
    <div class="d-flex contacts">
        <div class="phone">80292323953</div>
        <div class="email">example@gmail.com</div>
    </div>
</footer>
</div>
</div>
<script src="../../template/js/index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(
        function () {
            $("#add-to-card").click(
                function () {
                    var id = $(this).getAttribute("data-id");
                    $.post("/cart/addAjax/" + id, (), function (data) {
                        $("#cart-count").html(data);
                    })
                }
            );
        }
    );
</script>
</body>
</html>