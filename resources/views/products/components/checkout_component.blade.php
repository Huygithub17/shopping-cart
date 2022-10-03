<div class="checkout">
    <!-- Main content -->
    <form action="{{route('checkOut')}}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"
                                   name="name"
                                   value=""
                            >
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text"
                                   class="form-control"
                                   name="email"
                                   value=""
                            >
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text"
                                   class="form-control"
                                   name="phone"
                                   value=""
                            >
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text"
                                   class="form-control"
                                   name="address"
                                   value=""
                            >
                        </div>
                        <div class="form-group">
                            <label>Order note</label>
                            <input type="text"
                                   class="form-control"
                                   name="note"
                            >
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file"
                                   class="form-control-file"
                                   name="feature_image_path"
                            >
                            <div class="col-md-4 feature_image_container">
                                <div class="row">
                                    <img class="feature_image" src="" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </form>
    <!-- /.content -->
</div>

