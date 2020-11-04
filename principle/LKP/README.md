## 迪米特法则(Law of Demeter)又叫做最少知识原则（Least Knowledge Principle）

### 定义

> Each unit should have only limited knowledge about other units: only units "closely" related to the current unit（每个单元对其他单元只拥有有限的知识，只了解与当前单元紧密联系的单元）。
> Each unit should only talk to its friends; don't talk to strangers （每个单元只能和它的 "朋友" 交谈，不能和 "陌生人" 交谈）。
> Only talk to your immediate friends（只和自己直接的 "朋友" 交谈）。

### 解析

#### 直接的朋友
每个对象都会与其他对象有耦合关系，只要两个对象之间有耦合关系，我们就说这两个对象之间是朋友关系。耦合的方式很多，依赖，关联，组合，聚合等。其中，我们称出现成员变量，方法参数，方法返回值中的类为直接的朋友，而出现在局部变量中的类不是直接的朋友。也就是说，陌生的类最好不要以局部变量的形式出现在类的内部。

### 其他

- 该原则核心是降低类之间的耦合。
- 由于每个类都减少了不必要的依赖，因此迪米特法则只是要求降低类间(对象间)耦合关系，并不是要求完全没有依赖关系。
