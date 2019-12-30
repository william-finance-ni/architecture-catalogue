@extends('layouts.base')

@section('content')
  <div class="govuk-width-container ">
    <main class="govuk-main-wrapper " id="main-content" role="main">
      <div class="">
          <h1 class="govuk-heading-xl">Architecture Catalogue</h1>
          <p class="govuk-body">
            This architecture catalogue contains all of the solution building blocks (physical components) used by the NICS. This list is used to populate the NICS Architecture Portal which provides a publically accessible reference for architects designing solutions for the NICS.
          </p>

          <h2 class="govuk-heading-l">Search catalogue</h2>
          <form action="/catalogue/search" method="get">
            {{ csrf_field() }}

            <div class="govuk-form-group">
              <label class="govuk-label" for="name">
                Enter the name of an entry (e.g. GOV.UK Notify)
              </label>
              <input class="govuk-input govuk-!-width-two-thirds" id="name" name="name" type="text">
            </div>
            <div class="govuk-form-group">
              <label class="govuk-label" for="description">
                Enter the description of an entry (e.g. Notifications)
              </label>
              <input class="govuk-input govuk-!-width-two-thirds" id="description" name="description" type="text">
            </div>

            <button class="govuk-button govuk-!-margin-right-2" href="/entries" type="submtt">Search</button>
          </form>
      </div>

      <!-- only show features in local development -->
      <hr class="govuk-section-break govuk-section-break--l govuk-section-break--visible">
      @if (env('APP_ENV') == 'local')
          <h2 class="govuk-heading-l">Administration</h2>
          <a class="govuk-button govuk-button--secondary govuk-!-margin-right-2" data-module="govuk-button" href="/catalogue/export">
            Export catalogue
          </a>
          <a class="govuk-button govuk-button--secondary govuk-!-margin-right-2" data-module="govuk-button" href="/catalogue/upload">
            Import catalogue
          </a>
          <a class="govuk-button govuk-button--warning govuk-!-margin-right-2" data-module="govuk-button" href="/catalogue/delete">
            Delete catalogue
          </a>
      @endif
    </main>
  </div>
@endsection
