## 接口隔离原则（Interface Segregation Principle)

> 客户端不应该依赖它不需要的接口，即一个类对另一个类的依赖应该建立在最小的接口上。

### 问题
> 类A通过接口 interface1 依赖类B，类C通过接口 interface1 依赖类D，如果接口 interface1 对于类A 和 类C 来说不是最小接口，那么类B和类D必须去实现他们不需要方法。

### 方案
> 将接口 interface1 拆分为独立的几个接口，类A和类C分别与他们需要的接口建立依赖关系。