                    <article class="article-card">
                      <a class="card-link" href="<?php echo get_term_link($term); ?>">
                        <div class="image">
                          <img alt="" src="https://atrail.co.jp/wp-content/uploads/images/bg-page-shop.jpg" />
                        </div>
                        <div class=" body">
                          <p class="title"><?php echo $term->name; ?></p>
                          <p class="excerpt"><?php echo $term->description; ?></p>
                          <div class="buttonBox">
                            <button type="button" class="seeDetail">詳しくは→</button>
                          </div>
                        </div>
                      </a>
                    </article>
                  