function Stack() {
  this.__arr = [];
}

Stack.prototype = {
  constructor: Stack,
  push: function push(elem) {
    if (typeof elem !== 'undefined') return this.__arr.push(elem);
  },
  pop: function pop() {
    return this.__arr.pop();
  },
  top: function top() {
    return this.__arr[this.__arr.length - 1];
  },
  isEmpty: function isEmpty() {
    return this.__arr.length === 0;
  },
  toString: function toString() {
    return this.__arr.toString();
  },
};

function balancedParentheses(string) {
  var stack = new Stack();
  var i, len;

  string = string
    // remove any strings or regexes used in target string (if it is a function for example)
    .replace(/(\`.{0,}\`|\/.{0,}\/|\'.{0,}\'|\".{0,}\")/g, '');

  for (i = 0, len = string.length; i < len; i++) {
    switch (string[i]) {
      case '(':
      case '{':
      case '[':
        stack.push(string[i]);
        break;
      case ')':
        if (stack.top() !== '(') {
          return false;
        } else {
          stack.pop();
        }
        break;
      case '}':
        if (stack.top() !== '{') {
          return false;
        } else {
          stack.pop();
        }
        break;
      case ']':
        if (stack.top() !== '[') {
          return false;
        } else {
          stack.pop();
        }
        break;
    }
  }
  return stack.isEmpty();
}

export default function infixToPostfixWithParentheses(expr) {
  if (!balancedParentheses(expr)) return false;

  var postfix = '',
    i = 0,
    len = 0;
  var stack = new Stack();

  for (i, len = expr.length; i < len; i++) {
    if (expr[i].match(/[^\(\)\+\-\*\/\%]/)) {
      postfix += expr[i];
    } else if (stack.isEmpty()) {
      stack.push(expr[i]);
    } else {
      switch (expr[i]) {
        case ')':
          while (!stack.isEmpty() && stack.top() !== '(') {
            postfix += stack.pop();
          }
          stack.pop();
          break;
        case '+':
        case '-':
          if (stack.top().match(/[\*\/\%]/)) {
            while (!stack.isEmpty() && stack.top() !== '(') {
              postfix += stack.pop();
            }
          }
        default:
          stack.push(expr[i]);
          break;
      }
    }
  }
  while (!stack.isEmpty()) {
    postfix += stack.pop();
  }
  return postfix;
}

console.log(infixToPostfixWithParentheses('((AB) + (A+B) * (AB))'));
