<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="read.php" method = "post">
    <p>名前：<input type="text" name="name"></p>
    <p>所属：<input type="text" name="dept"></p>
    <p>以下のアンケートにお答えください。</p>
    <p>なお、回答は1~5の数字で回答してください。</p>
    <ul>
      <li>1:大変そう思う</li>
      <li>2:ややそう思う</li>
      <li>3:どちらとも言えない</li>
      <li>4:あまりそう思わない</li>
      <li>5:全然そう思わない</li>
    </ul>
    <p>Q1：今の会社に満足していますか？<input type="text" name="question1"></p>
    <p>Q2：転職したいですか？<input type="text" name="question2"></p>
    <p>Q3：起業したいですか？<input type="text" name="question3"></p>
    <input type="submit" value="送信">
  </form>
</body>
</html>