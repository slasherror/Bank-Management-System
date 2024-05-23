<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Partners Section</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .partners {
      padding: 20px;
      text-align: center;
    }

    .partners h1 {
      margin-bottom: 20px;
      font-size: 24px;
      color: orangered;
      font-weight: bold;
    }

    .partners .container {
      display: flex;
      flex-wrap: nowrap;
      justify-content: center;
      overflow-x: auto;
    }

    .partners .item {
      flex: 0 0 auto;
    }

    .partners .item img {
      display: block;
      width: 150px; 
      height: 150px;
      object-fit: contain;
    }
  </style>
</head>
<body>
  <section class="partners">
    <h1>Stakeholders</h1>
    <div class="container">
      <div class="item">
        <a href="https://www.bkash.com">
          <img src="user/assets/images/bkash.png" alt="Bkash">
        </a>
      </div>
      <div class="item">
        <a href="https://www.bb.org.bd/en/index.php">
          <img src="user/assets/images/bangladesh_bank.jpeg" alt="Bangladesh Bank">
        </a>
      </div>
      <div class="item">
        <a href="https://nagad.com.bd/">
        <img src="user/assets/images/nagad.png" alt="Nagad">
      </div>
      <div class="item">
        <a href="https://bangladesh.gov.bd/index.php">
          <img src="user/assets/images/bd_government.jpeg" alt="BD Government">
        </a>
      </div>
      <div class="item">
        <a href="https://www.kuet.ac.bd/">
        <img src="user/assets/images/kuet.jpeg" alt="KUET">
      </div>
      <div class="item">
        <a href="https://www.daraz.com.bd">
        <img src="user/assets/images/daraz.jpeg" alt="DARAZ">
      </div>
    </div>
  </section>
</body>
</html>
