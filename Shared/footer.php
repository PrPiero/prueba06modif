                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright &copy;AFFAREX 2021.</strong>
        </footer>
        <!-- BOTSTRAPP JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <!-- DataTables JS -->
        <script src="../Shared/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../Shared/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../Shared/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../Shared/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- DatePicker JS-->
        <script src="../Shared/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
        <script>
            $(function () {
                $('#posts-table').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    </div>
    <!-- ./wrapper -->
</body>
</html>