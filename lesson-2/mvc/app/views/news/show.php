<h1 class="mb-5">Новости</h1>

<div class="row">
<?php foreach ($news as $new ): ?>
    <div class="col-md-4">
        <div class="card">
            <img src="/public/images/<?php echo $new['img']?>"

                 style="height: 260px;"
                 class="card-img-top img-fluid" alt="<?php echo $new['title'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $new['title'] ?></h5>
                <p class="card-text"><?php echo $new['description'] ?></p>
            </div>
        </div>
    </div>

<?php endforeach ?>
</div>
