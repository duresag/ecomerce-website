<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                    <div class="col-md-7">
                        <form action="" method="GET">
                            <div class="input-group mb-3">

                                <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                    echo $_GET['search'];
                                } ?>" class="form-control product-search" placeholder="search">

                                <button class="btn btn-primary" type="submit" name="searchuser"> <i
                                        class="fa-solid fa-magnifying-glass"></i> </button>
                            </div>
                        </form>
                    </div>


                </div>


            </div>

        </div>
    </div>

</nav>