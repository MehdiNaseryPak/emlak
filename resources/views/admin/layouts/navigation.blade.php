<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li data-toggle="tooltip" title="دسته بندی ها">
                <a href="#categories" title=" دسته بندی ها">
                    <i class="icon ti-layout-list-thumb-alt"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="categories">
            <li>
                <a href="#">دسته بندی</a>
                <ul>
                    <li><a href="{{ route('category.create') }}">ایجاد دسته بندی</a></li>
                    <li><a href="{{ route('category.index') }}">لیست دسته بندی ها</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
