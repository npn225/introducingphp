<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Challenge: using loops</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Multiplication Table</h1>
<table>
    <tr>
        <th>&nbsp;</th>
        <!-- Creates the header row using php For-Foop -->
        <?php for($index = 1; $index < 13; ++$index): ?>
            <th><?php echo $index ?></th>
        <?php endfor; ?>
    </tr>

    <!-- Loop for the 12 rows in the Multiplication Table -->
    <?php for($index = 1; $index < 13; ++$index): ?>
        <tr>
            <!-- Outputs header for each row -->
            <th><?php echo $index; ?></th>
            <!-- The following For-Loop outputs the 12 values for each row -->
            <?php for($jindex = 1; $jindex < 13; ++$jindex): ?>
                <td><?php echo $index * $jindex; ?></td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>

    <!-- <tr>
        <th>1</th>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
        <td>9</td>
        <td>10</td>
        <td>11</td>
        <td>12</td>
    </tr>
    <tr>
        <th>2</th>
        <td>2</td>
        <td>4</td>
        <td>6</td>
        <td>8</td>
        <td>10</td>
        <td>12</td>
        <td>14</td>
        <td>16</td>
        <td>18</td>
        <td>20</td>
        <td>22</td>
        <td>24</td>
    </tr>
    <tr>
        <th>3</th>
        <td>3</td>
        <td>6</td>
        <td>9</td>
        <td>12</td>
        <td>15</td>
        <td>18</td>
        <td>21</td>
        <td>24</td>
        <td>27</td>
        <td>30</td>
        <td>33</td>
        <td>36</td>
    </tr>
    <tr>
        <th>4</th>
        <td>4</td>
        <td>8</td>
        <td>12</td>
        <td>16</td>
        <td>20</td>
        <td>24</td>
        <td>28</td>
        <td>32</td>
        <td>36</td>
        <td>40</td>
        <td>44</td>
        <td>48</td>
    </tr>
    <tr>
        <th>5</th>
        <td>5</td>
        <td>10</td>
        <td>15</td>
        <td>20</td>
        <td>25</td>
        <td>30</td>
        <td>35</td>
        <td>40</td>
        <td>45</td>
        <td>50</td>
        <td>55</td>
        <td>60</td>
    </tr>
    <tr>
        <th>6</th>
        <td>6</td>
        <td>12</td>
        <td>18</td>
        <td>24</td>
        <td>30</td>
        <td>36</td>
        <td>42</td>
        <td>48</td>
        <td>54</td>
        <td>60</td>
        <td>66</td>
        <td>72</td>
    </tr>
    <tr>
        <th>7</th>
        <td>7</td>
        <td>14</td>
        <td>21</td>
        <td>28</td>
        <td>35</td>
        <td>42</td>
        <td>49</td>
        <td>56</td>
        <td>63</td>
        <td>70</td>
        <td>77</td>
        <td>84</td>
    </tr>
    <tr>
        <th>8</th>
        <td>8</td>
        <td>16</td>
        <td>24</td>
        <td>32</td>
        <td>40</td>
        <td>48</td>
        <td>56</td>
        <td>64</td>
        <td>72</td>
        <td>80</td>
        <td>88</td>
        <td>96</td>
    </tr>
    <tr>
        <th>9</th>
        <td>9</td>
        <td>18</td>
        <td>27</td>
        <td>36</td>
        <td>45</td>
        <td>54</td>
        <td>63</td>
        <td>72</td>
        <td>81</td>
        <td>90</td>
        <td>99</td>
        <td>108</td>
    </tr>
    <tr>
        <th>10</th>
        <td>10</td>
        <td>20</td>
        <td>30</td>
        <td>40</td>
        <td>50</td>
        <td>60</td>
        <td>70</td>
        <td>80</td>
        <td>90</td>
        <td>100</td>
        <td>110</td>
        <td>120</td>
    </tr>
    <tr>
        <th>11</th>
        <td>11</td>
        <td>22</td>
        <td>33</td>
        <td>44</td>
        <td>55</td>
        <td>66</td>
        <td>77</td>
        <td>88</td>
        <td>99</td>
        <td>110</td>
        <td>121</td>
        <td>132</td>
    </tr>
    <tr>
        <th>12</th>
        <td>12</td>
        <td>24</td>
        <td>36</td>
        <td>48</td>
        <td>60</td>
        <td>72</td>
        <td>84</td>
        <td>96</td>
        <td>108</td>
        <td>120</td>
        <td>132</td>
        <td>144</td>
    </tr> -->
</table>
</body>
</html>
