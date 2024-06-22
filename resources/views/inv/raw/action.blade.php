<a href="javascript:void(0)" data-toggle="tooltip" onClick="editStaff('{{ $row->rid }}')" data-original-title="Edit"
    class="edit btn btn-success edit-{{ $row->rid }}">
    Edit
</a>
<a href="javascript:void(0);" id="delete-compnay" onClick="deleteStaff('{{ $row->rid }}')" data-toggle="tooltip"
    data-original-title="Disable" class="delete btn btn-danger delete-{{ $row->rid }}">
    Disable
</a>
