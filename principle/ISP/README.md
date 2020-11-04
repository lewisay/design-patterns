## 接口隔离原则（Interface Segregation Principle)

### 定义

> Clients should not be forced to depend upon interfaces that they do not use（客户端不应该依赖它不需要的接口）。

> The dependency of one class to another one should depend on the smallest possible interface（类间的依赖关系应该建立在最小的接口上）。

### 动机

类A通过接口 interface1 依赖类B，类C通过接口 interface1 依赖类D，如果接口 interface1 对于类A 和 类C 来说不是最小接口，那么类B和类D必须去实现他们不需要方法。

### 最佳实践

将接口 interface1 拆分为独立的几个接口，类A和类C分别与他们需要的接口建立依赖关系。

- 接口尽量小，主要是为了保证一个接口只服务一个子模块或者业务逻辑。
- 接口高内聚，是对内高度依赖，对外尽可能隔离。即一个接口内部的声明的方法相互之间都与某一个子模块相关，且是这个子模块必须的。