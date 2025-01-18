<div class="page-header">
    <div class="add-item d-flex">
        <div class="page-title">
            <h4>{{ $title }}</h4>
            <h6>{{ $subtitle }}</h6>
        </div>
    </div>
    <ul class="table-top-head">
        @if (Route::is('admin.stock.low'))
            <li>
                <div class="status-toggle d-flex justify-content-between align-items-center">
                    <input type="checkbox" id="user2" class="check" checked=""/>
                    <label for="user2" class="checktoggle">checkbox</label>
                    Notify
                </div>
            </li>
            <li>
                <a href="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#send-email">
                    <i data-feather="mail" class="feather-mail"></i>
                    Send Email
                </a>
            </li>
        @endif

        <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf">
                <img src="{{ asset('images/svg/pdf.svg') }}" alt="PDF">
            </a>
        </li>
        <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel">
                <img src="{{ asset('images/svg/excel.svg') }}" alt="Excel">
            </a>
        </li>
        <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print">
                <i data-feather="printer" class="feather-rotate-ccw"></i>
            </a>
        </li>
        <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh">
                <i data-feather="rotate-ccw"></i>
            </a>
        </li>
        <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header">
                <i data-feather="chevron-up"></i>
            </a>
        </li>
    </ul>

    @if ($addTitleText)

        <div class="page-btn">
            @if ($isModal)
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="{{ $modalTarget }}">
                    <i data-feather="plus-circle" class="me-2"></i>
                    {{ $addTitleText }}
                </a>
            @else
                <a href="{{ $routeTarget }}" class="btn btn-added">
                    <i data-feather="plus-circle" class="me-2"></i>
                    {{ $addTitleText }}
                </a>
            @endif
        </div>
    @endif

    @if ($importTitleText)
        <div class="page-btn import">
            <a href="#" class="btn btn-added color" data-bs-toggle="modal" data-bs-target="#view-notes">
                <i data-feather="download" class="me-2"></i>
                {{ $importTitleText }}
            </a>
        </div>
    @endif
</div>
