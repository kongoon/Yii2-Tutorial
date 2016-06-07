<?php
use kongoon\orgchart\OrgChart;
$this->title = 'Organization Chart';
?>
<h1><?=$this->title?></h1>

<?=OrgChart::widget([
    'data' => [
            [['v' => 'Mike', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Mike&w=120&h=150" /><br  /> <strong>Mike</strong><br  />The President'],'', 'The President'],
            [['v' => 'Jim', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Jim&w=120&h=150" /><br  /><strong>Jim</strong><br  />The Test'],'Mike', 'VP'],
            [['v' => 'ทดสอบ', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=ทดสอบ&w=120&h=150" /><br  /><strong>ทดสอบ</strong><br  />The Test'], 'Mike', ''],
            [['v' => 'Bob', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Bob&w=120&h=150" /><br  /><strong>Bob</strong><br  />The Test'], 'Jim', 'Bob Sponge'],
            [['v' => 'Caral', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Caral&w=120&h=150" /><br  /><strong>Caral</strong><br  />The Test'], 'Mike', 'Caral Title'],

    ]
])?>
<p>
    Test Organization
</p>
