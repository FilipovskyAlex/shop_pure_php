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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>