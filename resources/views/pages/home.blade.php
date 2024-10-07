
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
      *{
        font-family: "Montserrat Alternates", sans-serif;
      }
    </style>

    <title>sas-pos</title>
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  </head>
  <body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 ">
      <div class="container-fluid ">
        <a class="navbar-brand" href="#">speedpos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Feature
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Poin Of Sales (POS)</a></li>
                <li><a class="dropdown-item" href="#">Absensi Wajah</a></li>
                <li><a class="dropdown-item" href="#">Laporan Penjualan</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Bussines
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 500%">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                        <th scope="col">F&B</th>
                        <th scope="col">Retail</th>
                        <th scope="col">Jasa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><p style="font-size: 16px">Cocok untuk restoran, kedai kopi, minuman, cepat saji, toko roti, dan katering.</p></td>
                      <td><p style="font-size: 16px">Cocok untuk restoran, kedai kopi,toko roti, dan katering. </p></td>
                      <td> <p style="font-size: 16px">Cocok untuk restoran, kedai kopi, dan katering.</p></td>
                    </tr>
                  </tbody>
                </table>
               </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link ">Pricing</a>
            </li> 
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Others
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
              </ul>
            </li>
          </ul>
          <div class="d-flex">
            <a href="" class="me-4 pt-2" style="color: #ffffff; text-decoration:none">masuk</a>
            <button class="btn btn-warning" type="submit">coba gratis</button>
          </div>
        </div>
      </div>
    </nav>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
  </body>
</html>
