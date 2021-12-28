            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"  crossorigin="anonymous"></script>
    <!-- Bootstrap Core JavaScript -->
    <!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('#selectAllBoxes').click(function(){
                if(this.checked){
                    $('.checkBoxes').each(function(){
                        this.checked=true;
                    })
                }else{
                    $('.checkBoxes').each(function(){
                        this.checked=false;
                    })
                }
            })
        })
    
</script>
</body>

</html>
