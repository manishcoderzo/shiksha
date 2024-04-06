@extends('superAdmin.layout.app')
@section('title', 'Add')

@section('content')
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dashboard</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="javascript:;">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Block</li>
                        </ol>

                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" onclick="window.location='{{route('blockList')}}'">List</button>
            </div>

            
            <div class="mt-2">
                <div class="card">
                  <div class="card-body">
                    @if(Session::has('success'))
                      <div class="alert {{ Session::get('alert-class', 'alert-success') }}"> 
                        {{ Session::get('success') }}
                      </div>
                     @endif
                    <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">Block Create</h6>

                     <hr>
                    <form class="row g-3" action="{{route('blockSubmit')}}" method="post">
                        @csrf
                      <div class="col-4">
                        <label class="form-label">State</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="state" name="stateId">
                            <option selected  disabled>Option..</option>
                            @foreach($state as $s)
                            <option value="{{$s->state_id}}">{{$s->state_title}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-4">
                        <label class="form-label">District</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="district" name="districtid">
                            
                        </select>
                      </div>
                      
                      <div class="col-4">
                        <label class="form-label">Block</label>
                        <!-- <input type="text" class="form-control" name="blockName"> --><br>
                        <input type="hidden" class="form-control"  id="tagInput" name="blockName">
                        <div class="tag-container" onclick="addTagInput()">
                          <div class="tag" contenteditable="true">Enter tags...</div>
                        </div>

                      </div>
                      
                      <div class="col-12">
                        <div class="d-grid">
                          <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                      </div>
            
                    </form>
                    
                  </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
    <style>
        .tag-container {
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            cursor: text;
        }
      .tag {
        display: inline-block;
        background-color: #00BCD4;
        color: #fff;
        padding: 5px 10px;
        margin-right: 5px;
        border-radius: 3px;
      }
      .tag input {
        border: none;
        outline: none;
        background: transparent;
        width: auto;
      }
      .tag-close {
        cursor: pointer;
        margin-left: 5px;
      }
    </style>
    <!--end page content wrapper-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
  function addTagInput() {
    const tagContainer = document.querySelector('.tag-container');
    const tag = document.createElement('div');
    tag.classList.add('tag');
    const input = document.createElement('input');
    input.type = 'text';
    input.placeholder = 'Enter tags...';
    input.autofocus = true;
    input.addEventListener('keypress', function(event) {
      if (event.key === 'Enter') {
        if (input.value.trim() !== '') {
          addTag(input.value.trim());
          input.value = '';
        }
        event.preventDefault();
      }
    });
    input.addEventListener('blur', function() {
      if (!input.value.trim()) {
        tag.remove();
      }
    });
    tag.appendChild(input);
    tagContainer.insertBefore(tag, tagContainer.lastChild);
    input.focus();
  }

  function addTag(tagValue) {
    const tagContainer = document.querySelector('.tag-container');
    const tag = document.createElement('div');
    tag.classList.add('tag');
    tag.textContent = tagValue;
    const closeBtn = document.createElement('span');
    closeBtn.classList.add('tag-close');
    closeBtn.textContent = '✖';
    closeBtn.addEventListener('click', function() {
      tag.remove();
    });
    tag.appendChild(closeBtn);
    tagContainer.insertBefore(tag, tagContainer.lastChild);
    sendData(tagValue);
  }

  function sendData(tagValue) {
    const tagInput = document.getElementById('tagInput');
    tagInput.value += (tagInput.value ? ',' : '') + tagValue;
  }

  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('tagForm').addEventListener('submit', function(event) {
      // Show the form before submitting it
      this.style.display = 'block';
    });
  });
</script>
<script>

    jQuery(document).ready(function() {
        jQuery('#state').change(function(){
            let sid = jQuery(this).val();
            jQuery.ajax({
                url:'/districtGet',
                method: 'POST',
                data: 'sid='+sid+'&_token={{csrf_token()}}',
                success: function(result){
                    jQuery('#district').html(result);
                    // alert(result)
                    // $("#title").html(result);
                }
            })
        });
    });
</script>
@endsection