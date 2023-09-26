<?php
$categories = $conn->prepare('SELECT * FROM `categories` WHERE Active = 1');
$categories->execute();
?>

<section class="category">
        <div class="swiper category-slider">
            <div class="swiper-wrapper ">
        <?php 
            if($categories->rowCount() > 0){
                while($fetch_categories = $categories->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        
                            <a href="category.php?category=<?= $fetch_categories['CategoryName']; ?>" class="swiper-slide slide bg-neutral-200 flex flex-col items-center justify-center hover:bg-blue-200 hover:scale-110 transition-all rounded-lg"> 
                            <img src="../<?= $fetch_categories['ImagePath']; ?>" alt="<?= $fetch_categories['CategoryDescription']; ?>" class="h-[8rem] w-fit mb-4 mt-4 select-none ">
                            <h3 class="text-lg select-none "><?= $fetch_categories['CategoryDescription']; ?></h3>
                            </a>
                    <?php
                }
            }
        ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        </section>