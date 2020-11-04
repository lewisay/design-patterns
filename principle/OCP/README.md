## 开闭原则（Open Closed Principle）

### 定义

> software entities (modules, classes, functions, etc.) should be open for extension, but closed for modification（软件实体（模块，类，方法等）应该对扩展开放，对修改关闭。

### 解析

- 一个软件实体如类，模块和函数应该对扩展开放(对提供方，提供功能的一方)，对修改关闭(对使用方，已有代码无需改动)。用抽象构建框架，用实现扩展细节。
- 当软件需要变化时，尽量通过扩展软件实体的行为来实现变化，而不是通过修改已有的代码来实现变化。
- 开闭原则是最基础的一个原则，其他五个原则都是开闭原则的具体形态，编程中遵循其它原则，以及使用设计模式的目的就是遵循开闭原则。