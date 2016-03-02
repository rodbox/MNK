<div class="sub-menu-top fixed">
    <ul>
        <li class="toggled">
            <span class="menu-title">file</span>
            <ul>
                <li>
                    <a href="#" id="param-rocket-new">
                        <?php ui::svg("file2",16); ?>
                    </a>
                </li>
                <li><?php
                    mnk::ilink("pack-view:rocket-v2/form-load,rocket-list-files #form-load.modal-view");
                    ui::svg("folder",16,0);
                ?></a></li>
                <li><?php
                    mnk::ilink("pack-view:rocket-v2/form-export #form-export.modal-view");
                    ui::svg("disk",16,0);
                    ?></a>
                </li>
                    <li><?php mnk::ilink("pack-view:rocket-v2/form-setting,bg-list .modal-view"); ?>
                        <?php ui::svg("settings",16); ?>
                    </a>
                </li>
               <!--  </li>
                    <li><a href="#" id="render">render</a>

                </li> -->
            </ul>
        </li>
        <li class="toggled">
            <span class="menu-title">select</span>
            <ul>
                <li><a href="#" id="rocket-param-select-toggle" ><?php ui::svg("arrow7",16,0); ?></a></li>
                <li><a href="#" id="rocket-param-select-all" ><?php ui::svg("stats2",16,0); ?></a></li>
                <li><a href="#type-0" class="rocket-param-select" ><?php ui::svg("folder4",16,0); ?></a></li>
                <li><a href="#type-1" class="rocket-param-select" ><?php ui::svg("func",16,0); ?></a></li>
                <li><a href="#type-2" class="rocket-param-select" ><?php ui::svg("list",16,0); ?></a></li>
                <li><a href="#linked" class="rocket-param-select-linked" ><?php ui::svg("tree3",16,0); ?></a></li>
                <li><a href="#" id="rocket-param-unselect" ><?php ui::svg("spinner3",16,0); ?></a></li>
                <li><a href="#" id="rocket-param-delete" ><?php ui::svg("remove",16,0); ?></a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li><a href="#" id="undo" class="alpha_2 disabled"><?php ui::svg("undo",16,"000",0); ?></a></li>
    </ul>
    <ul>
        <li><a href="#" id="rocket-param-select" class="toggled toggled-on"><?php ui::svg("cursor",16,0); ?></a></li>
    </ul>
    <ul>
        <li><a href="#" id="rocket-param-linker" class="toggled"><?php ui::svg("tree3",16,0); ?></a></li>
        <li><a href="#" id="rocket-param-locker" class="toggled"><?php ui::svg("lock4",16,0); ?></a></li>
    </ul>
    <ul>
        <li><a href="#" class="rocket-align" id="rocket-align-left"><?php ui::svg("align-left",16,0); ?></a></li>
        <li><a href="#" class="rocket-align" id="rocket-align-center-horizontal"><?php ui::svg("align-center-horizontal",16,0); ?></a></li>
        <li><a href="#" class="rocket-align" id="rocket-align-right"><?php ui::svg("align-right",16,0); ?></a></li>
        <li><a href="#" class="rocket-align" id="rocket-align-top"><?php ui::svg("align-top",16,0); ?></a></li>
        <li><a href="#" class="rocket-align" id="rocket-align-center-vertical"><?php ui::svg("align-center-vertical",16,0); ?></a></li>
        <li><a href="#" class="rocket-align" id="rocket-align-bottom"><?php ui::svg("align-bottom",16,0); ?></a></li>
        <li><a href="#" class="rocket-align" id="rocket-align-list-vertical"><?php ui::svg("list3",16,0); ?></a></li>
        <li><a href="#" class="rocket-align" id="rocket-align-list-horizontal"><?php ui::svg("list4",16,0); ?></a></li>
    </ul>
    <ul>
        <li>
            <a href="#" id="clean">
                <?php ui::svg("checkmark3",16,0); ?>
            </a>
        </li>
        <li>
            <?php form::textIco("rocket-search-param","search4","","e1>e2>e3"); ?>
            <a href="#" id="select-by-id" class="hide rocket-search-param-meta-search-action">select</a> 
            <a href="#" id="find-by-id" class="hide rocket-search-param-meta-search-action">find</a> 
            <a href="#" id="connect-by-id" class="hide rocket-search-param-meta-search-action">connect</a>  
            <a href="#" id="clean-by-id" class="hide rocket-search-param-meta-search-action">clean</a> 
            <a href="#" id="del-by-id" class="hide rocket-search-param-meta-search-action">delete</a>
        </li>
    </ul>
</div>