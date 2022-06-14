<?php $this->layout('layout_load') ?>
<?php $this->start('modal') ?>
<div class="mt-5 pe-5">
    <!-- Modal -->
    <div class="modal fade modal-dialog modal-dialog-scrollable" id="staticBackdrop" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">File Upload</h5>
                </div>
                <div id="msnModal"></div>
                <div class="modal-body">
                   
                        <div>
                            <h4 id="infoUp"></h4>
                        </div>
                    <br>
                    <form id="formUpload" method="post" enctype="multipart/form-data">
                        Select file to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload"><br>

                        <div class="modal-footer">
                            <button id=bntClos type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button id=bntSumt type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->end() ?>

<?php $this->start('table') ?>
<div class=" m-0 row justify-content-center">
    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <table id="tableCsv" class="table table-hover table table-striped">
            <thead class="table-success">
                <tr>
                    <th scope="col"># Code</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<?php $this->end() ?>