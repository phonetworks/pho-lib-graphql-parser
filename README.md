# pho-lib-graphql-parser

A general purpose GraphQL schema parser library in PHP. This library does **not** parse GraphQL queries or responses.

## Dependencies

The following dependencies must be met before installing pho-lib-graphql-parser. Please note, the patches shown must be applied since schema support is still experimental.

1. The [LibGraphQLParser](https://github.com/graphql/libgraphqlparser) library by Facebook. Make sure the experimental schema support is enabled with this [patch](https://github.com/graphql/libgraphqlparser/pull/49/files).
2. The [graphql-parser-php](https://github.com/dosten/graphql-parser-php) PHP extension. Make sure the experimental schema support is enabled with this [patch](https://github.com/dosten/graphql-parser-php/pull/4/commits/63d9108567a81d4777f031044dbaf65017d7a139).

## Installation

Once you make sure that all the dependencies are properly satisfied, the recommended way to install pho-lib-graphql-parser is [through composer](https://getcomposer.org/). It's as simple as:

```bash
composer require phonetworks/pho-lib-graphql-parser
```

## Usage

Suppose you have the following GraphQL schema file as ```BasicSchema.graphql```:

```
type Basic implements Something {
  id: ID!,
  context: String!
  user: User @the_directive(the_argument: "TheValue")
}
```

Then, you can parse it via:

```php
$parsed = new Pho\Lib\GraphQL\Parser\Parse("BasicSchema.graphql");
foreach($parsed as $node) {
  $node_name = $node->name(); // Basic
  $implementations = $node->implementations(); // an array with a single element
  $implementation_name = $node->implementations(0)->name(); // Something
  $directives = $node->directives(); // no root level directive. But we would have one if it was type Basic @is_a { ...
  $fields = $node->fields(); // we have three; id, context and user.
  $field_1["name"] = $node->field(0)->name(); // id
  $field_1["type"] = $node->field(0)->type(); // ID
  $field_1["nullable"] = $node->field(0)->nullable(); // false (due to !)
  $field_3["directives"][0] = $node->field(0)->directive(0)->name(); // the_directive
  $field_3["directives"][0]["arguments"][0]["name"] = $node->field(0)->directive(0)->name(); // the_argument
  $field_3["directives"][0]["arguments"][0]["value"] = $node->field(0)->directive(0)->value(); // TheValue 
}
```
Please note, for argument values, we currently support String only.

## License

Released under the terms of the permissive [MIT license](http://opensource.org/licenses/MIT).
