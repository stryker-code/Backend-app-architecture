$('form').validate({
    rules: {
      fields: "required",
      operators:  "required",
      fieldvalue:{
                required: true,
                digits: true,
            },
    },
    messages: {
      fields: "!",
      operators: "!",
      fieldvalue: "!",
    },
});
